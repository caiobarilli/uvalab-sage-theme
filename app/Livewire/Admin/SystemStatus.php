<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class SystemStatus extends Component
{
    public bool $wooInstalled = false;

    public string $wooVersion = '';

    public bool $comingSoon = false;

    public ?int $myaccountPageId = null;

    public ?string $myaccountTitle = null;

    public ?string $myaccountContent = null;

    public bool $permalinkOk = false;

    public int $productCount = 0;

    public function mount(): void
    {
        $this->wooInstalled = function_exists('WC');
        $this->wooVersion = $this->wooInstalled ? WC()->version : '';
        $this->comingSoon = get_option('woocommerce_coming_soon') === 'yes';

        if ($this->wooInstalled) {
            $counts = wp_count_posts('product');
            $this->productCount = (int) ($counts->publish ?? 0);
        }

        $this->myaccountPageId = get_option('woocommerce_myaccount_page_id') ?: null;

        if ($this->myaccountPageId) {
            $page = get_post($this->myaccountPageId);
            $this->myaccountTitle = $page?->post_title;
            $this->myaccountContent = $page?->post_content;
        }

        $this->permalinkOk = get_option('permalink_structure') === '/%postname%/';
    }

    public function render()
    {
        return view('livewire.admin.system-status');
    }
}
