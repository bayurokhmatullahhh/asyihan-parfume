<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageManagementController extends Controller
{
    /**
     * Display a listing of contact messages (Pesan Jiwa).
     */
    public function index(Request $request): View
    {
        $query = ContactMessage::with('user')->latest();

        // Filter by Read/Unread status
        if ($request->filled('status')) {
            if ($request->status === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->status === 'read') {
                $query->where('is_read', true);
            }
        }

        // Filter by User Type (Registered Member vs Guest)
        if ($request->filled('user_type')) {
            if ($request->user_type === 'registered') {
                $query->whereNotNull('user_id');
            } elseif ($request->user_type === 'guest') {
                $query->whereNull('user_id');
            }
        }

        // Filter by Category
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Search by keyword
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('birth_info', 'like', "%{$search}%")
                    ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $messages = $query->paginate(20)->withQueryString();

        $categories = ContactMessage::select('category')
            ->distinct()
            ->pluck('category');

        $stats = [
            'total' => ContactMessage::count(),
            'unread' => ContactMessage::where('is_read', false)->count(),
            'read' => ContactMessage::where('is_read', true)->count(),
            'registered' => ContactMessage::whereNotNull('user_id')->count(),
            'guest' => ContactMessage::whereNull('user_id')->count(),
        ];

        return view('admin.messages.index', compact('messages', 'categories', 'stats'));
    }

    /**
     * Toggle or mark the specified message as read/unread.
     */
    public function markAsRead(ContactMessage $message): RedirectResponse
    {
        $newStatus = ! $message->is_read;
        $message->update([
            'is_read' => $newStatus,
            'read_at' => $newStatus ? now() : null,
        ]);

        $statusText = $newStatus ? 'telah ditandai sebagai dibaca' : 'dikembalikan ke status belum dibaca';

        return redirect()->back()->with('success', "Pesan jiwa dari {$message->name} {$statusText}.");
    }

    /**
     * Remove the specified contact message.
     */
    public function destroy(ContactMessage $message): RedirectResponse
    {
        $name = $message->name;
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', "Pesan jiwa dari {$name} berhasil dihapus dari arsip.");
    }
}
