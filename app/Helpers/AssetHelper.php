<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Vite;
use Carbon\Carbon;

class AssetHelper
{
    // Function that returns the path of the icon corresponding to a given asset category
    public static function categoryLabel(string $category): string
    {
        return match ($category) {
            'Laptop' => Vite::asset('resources/icons/laptop-icon.svg'),
            'Desktop' => Vite::asset('resources/icons/desktop-icon.svg'),
            'Tablet' => Vite::asset('resources/icons/tablet-icon.svg'),
            'Printer' => Vite::asset('resources/icons/printer-icon.svg'),
            'Peripherals' => Vite::asset('resources/icons/peripherals-icon.svg'),
            'Network equipment' => Vite::asset('resources/icons/network-equipment-icon.svg'),
            default => Vite::asset('resources/icons/desktop-icon.svg'),
        };
    }

    // Function that returns a human-readable string representing the time elapsed since a given date
    public static function timeAgo(string $date): string
    {
        $date = Carbon::parse($date);
        $now = Carbon::now();

        $diff = $date->diff($now);

        $parts = [];

        if ($diff->y > 0) {
            $parts[] = $diff->y . ' ' . ($diff->y === 1 ? 'Year' : 'Years');
        }

        if ($diff->m > 0) {
            $parts[] = $diff->m . ' ' . ($diff->m === 1 ? 'month' : 'months');
        }

        if ($diff->d > 0) {
            $parts[] = $diff->d . ' ' . ($diff->d === 1 ? 'day' : 'days');
        }

        if (empty($parts)) {
            if ($diff->h > 0) {
                return $diff->h . ' ' . ($diff->h === 1 ? 'hour' : 'hours') . ' ago';
            }

            if ($diff->i > 0) {
                return $diff->i . ' ' . ($diff->i === 1 ? 'minute' : 'minutes') . ' ago';
            }

            return 'Just now';
        }

        return implode(' and ', $parts) . ' ago';
    }

    // Function that returns the initials of a given name
    public static function initials(string $name): string
    {
        $name = trim($name);

        if ($name === '') {
            return '';
        }

        $parts = preg_split('/\s+/', $name);

        if (count($parts) === 1) {
            return strtoupper(substr($parts[0], 0, 1));
        }

        $first = $parts[0];
        $last = $parts[count($parts) - 1];

        return strtoupper(
            substr($first, 0, 1) .
                substr($last, 0, 1)
        );
    }

    // Functtion that formats a date string into a more readable formal (eg. 12 Jul 2026)
    public static function formatDate(string $date): string
    {
        return Carbon::parse($date)->format('d M Y');
    }


    // Function that returns the number of days left until the warranty expires, or the number of days since it expires.
    public static function warrantyDaysLeft(
        string $purchaseDate,
        string $expirationDate
    ): string {
        $purchase = Carbon::parse($purchaseDate);
        $expiration = Carbon::parse($expirationDate);
        $today = Carbon::today();

        // Total warranty duration
        $totalDays = $purchase->diffInDays($expiration);

        // Days remaining
        $daysLeft = $today->diffInDays($expiration, false);

        if ($daysLeft > 0) {
            return $daysLeft . ' days left';
        }

        if ($daysLeft === 0) {
            return 'Expires today';
        }

        return abs($daysLeft) . ' days expired';
    }
}
