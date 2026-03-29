<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="lg">{{ __('Cache', 'sage') }}</flux:heading>
            <flux:text>{{ __('Clear all compiled Acorn/Laravel cache files.', 'sage') }}</flux:text>
        </div>
        <flux:button wire:click="clear" wire:loading.attr="disabled" icon="trash">
            <span wire:loading.remove>{{ __('Clear Cache', 'sage') }}</span>
            <span wire:loading>{{ __('Clearing...', 'sage') }}</span>
        </flux:button>
    </div>

    @if ($ran)
        <flux:callout icon="{{ $success ? 'check-circle' : 'exclamation-triangle' }}"
            variant="{{ $success ? 'success' : 'danger' }}" inline>
            <flux:callout.heading>
                {{ $success ? __('Cache cleared successfully', 'sage') : __('Cache clear failed', 'sage') }}
            </flux:callout.heading>
            <flux:callout.text>
                <pre class="text-xs whitespace-pre-wrap">{{ $output }}</pre>
            </flux:callout.text>
        </flux:callout>
    @endif
</div>
