<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ShortcodesServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerShortcodes();
        $this->processShortcodesInBlocks();
        $this->disableAutopForLivewire();
    }

    private function registerShortcodes(): void
    {
        add_shortcode('livewire', function ($atts) {
            $atts = shortcode_atts(['component' => ''], $atts);

            if (empty($atts['component'])) {
                return '';
            }

            return '<!--livewire-start-->'.Livewire::mount($atts['component']).'<!--livewire-end-->';
        });

        add_shortcode('uvalab_my_account', function () {
            return '<!--livewire-start-->'.Livewire::mount('customer.dashboard').'<!--livewire-end-->';
        });
    }

    private function processShortcodesInBlocks(): void
    {
        add_filter('render_block', function (string $blockContent, array $block) {
            if ($block['blockName'] === 'core/shortcode') {
                return do_shortcode($blockContent);
            }

            return $blockContent;
        }, 10, 2);
    }

    private function disableAutopForLivewire(): void
    {
        add_filter('template_redirect', function () {
            ob_start(function (string $html) {
                return preg_replace_callback(
                    '/<!--livewire-start-->(.+?)<!--livewire-end-->/s',
                    function ($matches) {
                        $output = $matches[1];
                        $output = str_replace(['<p>', '</p>'], '', $output);
                        $output = preg_replace('/<br\s*\/?>/', '', $output);

                        return $output;
                    },
                    $html
                );
            });
        });
    }
}
