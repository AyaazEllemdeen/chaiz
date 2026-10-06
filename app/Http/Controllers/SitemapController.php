<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Carbon;

class SitemapController extends Controller
{
    /**
     * Public, indexable pages.
     * The thank-you page is excluded on purpose (session-gated, redirects without lead data).
     */
    protected function pages(): array
    {
        return [
            [
                'url'        => url('/'),
                'view'       => 'home',
                'changefreq' => 'weekly',
                'priority'   => '1.0',
            ],
        ];
    }

    public function index(): Response
    {
        $xml  = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($this->pages() as $page) {
            $xml .= "    <url>\n";
            $xml .= '        <loc>' . htmlspecialchars($page['url'], ENT_XML1) . "</loc>\n";
            $xml .= '        <lastmod>' . $this->lastModified($page['view']) . "</lastmod>\n";
            $xml .= '        <changefreq>' . $page['changefreq'] . "</changefreq>\n";
            $xml .= '        <priority>' . $page['priority'] . "</priority>\n";
            $xml .= "    </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    /**
     * Use the Blade view's file modified time as lastmod, falling back to today.
     */
    protected function lastModified(?string $view): string
    {
        if ($view) {
            $path = resource_path('views/' . str_replace('.', '/', $view) . '.blade.php');

            if (is_file($path)) {
                return Carbon::createFromTimestamp(filemtime($path))->toAtomString();
            }
        }

        return Carbon::now()->startOfDay()->toAtomString();
    }
}