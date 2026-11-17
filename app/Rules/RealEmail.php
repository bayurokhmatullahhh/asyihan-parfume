<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RealEmail implements ValidationRule
{
    /**
     * Common disposable, temporary, and fake email domains.
     *
     * @var array<string>
     */
    protected static array $disposableDomains = [
        'mailinator.com',
        'guerrillamail.com',
        'guerrillamail.net',
        'guerrillamail.org',
        'tempmail.com',
        'temp-mail.org',
        'temp-mail.io',
        '10minutemail.com',
        '10minutemail.net',
        'yopmail.com',
        'yopmail.fr',
        'yopmail.net',
        'cool.fr.nf',
        'jetable.fr.nf',
        'courriel.fr.nf',
        'moncourrier.fr.nf',
        'monemail.fr.nf',
        'monmail.fr.nf',
        'trashmail.com',
        'trashmail.net',
        'sharklasers.com',
        'dispostable.com',
        'getnada.com',
        'inboxkitten.com',
        'crazymailing.com',
        'throwawaymail.com',
        'fakemailgenerator.com',
        'mohmal.com',
        'burnermail.io',
        'maildrop.cc',
        'emailondeck.com',
        'nada.ltd',
        'dropmail.me',
        'tempail.com',
        'mytemp.email',
        'fakemail.net',
        'generator.email',
        'disposablemail.com',
        'tempmail.net',
        'temporary-mail.net',
        'armyspy.com',
        'cuvox.de',
        'dayrep.com',
        'fleckens.hu',
        'gustr.com',
        'jourrapide.com',
        'rhyta.com',
        'superrito.com',
        'teleworm.us',
        'einrot.com',
        'spamgourmet.com',
        'mytempemail.com',
        'fakemail.com',
        'fake.com',
        'test.com',
        'test.test',
        'asdf.com',
        'dummy.com',
        'contoh.com',
        'sample.com',
        'mailcatch.com',
        'inboxproxy.com',
        'binkmail.com',
        'bobmail.info',
        'chacuo.net',
        'devnullmail.com',
        'letthemeatspam.com',
        'mailinater.com',
        'suremail.info',
        'tradermail.info',
        'veryrealemail.com',
        'zippymail.info',
        'discard.email',
        'discardmail.com',
        'spambog.com',
        'spambog.de',
        'spambog.ru',
        'fastacura.com',
        'spamspot.com',
        '0-mail.com',
        'getairmail.com',
        'mintemail.com',
        'mytempemail.com',
        'owlymail.com',
        'tmailor.com',
    ];

    /**
     * Common placeholder / fake usernames.
     *
     * @var array<string>
     */
    protected static array $fakeUsernames = [
        'test',
        'testing',
        'tester',
        'fake',
        'dummy',
        'asdf',
        'asdfgh',
        'qwerty',
        'admin',
        'root',
        'sample',
        'contoh',
        'user',
        'someone',
        '12345',
        '123456',
        '12345678',
        'noreply',
        'no-reply',
    ];

    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value) || trim($value) === '') {
            return;
        }

        $email = strtolower(trim($value));

        // 1. Basic RFC Regex Validation
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $fail('Format alamat email tidak valid.');

            return;
        }

        $parts = explode('@', $email);
        if (count($parts) !== 2) {
            $fail('Format alamat email tidak valid.');

            return;
        }

        [$username, $domain] = $parts;

        // 2. Reject obvious placeholder / dummy usernames
        if (in_array($username, self::$fakeUsernames, true)) {
            $fail('Mohon gunakan alamat email pribadi asli Anda, bukan email contoh atau percobaan.');

            return;
        }

        // 3. Domain validation (must have valid dot & min 2 chars TLD)
        $domainParts = explode('.', $domain);
        if (count($domainParts) < 2) {
            $fail('Domain email tidak lengkap (contoh: @gmail.com).');

            return;
        }

        $tld = end($domainParts);
        if (strlen($tld) < 2 || ! ctype_alpha($tld)) {
            $fail('Ekstensi domain email tidak valid.');

            return;
        }

        // 4. Reject disposable / temporary email providers
        if (in_array($domain, self::$disposableDomains, true)) {
            $fail('Email sementara (disposable/temp mail) tidak diizinkan. Mohon gunakan email aktif Anda.');

            return;
        }

        // Reject subdomains of disposable services
        foreach (self::$disposableDomains as $disposable) {
            if (str_ends_with($domain, '.'.$disposable)) {
                $fail('Email sementara (disposable/temp mail) tidak diizinkan. Mohon gunakan email aktif Anda.');

                return;
            }
        }

        // 5. DNS MX Record Check (Ensure domain actively receives emails)
        // Skip DNS check in testing environment if test domain or when offline
        if (! app()->environment('testing')) {
            try {
                $hasMx = checkdnsrr($domain, 'MX');
                $hasA = $hasMx ? true : checkdnsrr($domain, 'A');

                if (! $hasMx && ! $hasA) {
                    $fail("Domain email \"@{$domain}\" tidak ditemukan atau tidak memiliki server surat aktif. Mohon periksa kembali penulisan email Anda.");

                    return;
                }
            } catch (\Throwable $e) {
                // If DNS query fails due to local network glitch, silently continue to avoid false rejections
            }
        }
    }

    /**
     * Get disposable domains list (can be used for JS export if needed).
     *
     * @return array<string>
     */
    public static function getDisposableDomains(): array
    {
        return self::$disposableDomains;
    }
}
