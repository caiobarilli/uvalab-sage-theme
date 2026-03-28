<?php

namespace App\Livewire;

use Livewire\Component;

class Slider extends Component
{
    public string $type = 'hero';

    public array $slides = [];

    public function mount(): void
    {
        if ($this->type === 'hero') {
            $query = new \WP_Query([
                'post_type' => 'hero_slide',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish',
            ]);

            $this->slides = array_map(fn ($post) => [
                'title' => $post->post_title,
                'content' => apply_filters('the_content', $post->post_content),
            ], $query->posts);
        }
    }

    public function render()
    {
        return view('livewire.slider');
    }
}
