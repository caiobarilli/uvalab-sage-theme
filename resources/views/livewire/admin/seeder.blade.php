<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="lg">{{ __('Seeder', 'sage') }}</flux:heading>
            <flux:text>{{ __('Run all database seeders.', 'sage') }}</flux:text>
        </div>
        <flux:button wire:click="run" wire:loading.attr="disabled" icon="circle-stack">
            <span wire:loading.remove>{{ __('Run Seeders', 'sage') }}</span>
            <span wire:loading>{{ __('Running...', 'sage') }}</span>
        </flux:button>
    </div>

    @if ($ran)
        <flux:callout icon="{{ $success ? 'check-circle' : 'exclamation-triangle' }}"
            variant="{{ $success ? 'success' : 'danger' }}" inline>
            <flux:callout.heading>{{ $success ? __('Seeders ran successfully', 'sage') : __('Seeder failed', 'sage') }}
            </flux:callout.heading>
            <flux:callout.text>
                <pre class="text-xs whitespace-pre-wrap">{{ $output }}</pre>
            </flux:callout.text>
        </flux:callout>
    @endif
</div>
