<?php

namespace App\Livewire\Admin\Sliders;

use Flux\Flux;
use Livewire\Component;
use Livewire\WithPagination;

class HeroSlider extends Component
{
    use WithPagination;

    public ?int $id = null;

    public string $title = '';

    public function onDeleteModal(int $id): void
    {
        $post = get_post($id);

        if (! $post || $post->post_type !== 'hero_slide') {
            Flux::toast(
                heading: 'Slide not found',
                text: 'The requested slide does not exist.',
                variant: 'error'
            );

            return;
        }

        $this->id = $id;
        $this->title = $post->post_title;

        Flux::modal('delete')->show();
    }

    public function onDelete(): void
    {
        $post = get_post($this->id);

        if (! $post || $post->post_type !== 'hero_slide') {
            Flux::toast(
                heading: 'Slide not found',
                text: 'The requested slide does not exist.',
                variant: 'error'
            );

            Flux::modal('delete')->close();

            return;
        }

        wp_delete_post($this->id, true);

        Flux::toast(
            heading: 'Slide deleted',
            text: 'The slide has been deleted successfully.',
            variant: 'success'
        );

        Flux::modal('delete')->close();

        $this->resetPage();
    }

    #[\Livewire\Attributes\Computed]
    public function slides(): array
    {
        $query = new \WP_Query([
            'post_type' => 'hero_slide',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC',
            'post_status' => ['publish', 'draft'],
        ]);

        return $query->posts;
    }

    public function render()
    {
        return view('livewire.admin.sliders.hero-slider');
    }
}
