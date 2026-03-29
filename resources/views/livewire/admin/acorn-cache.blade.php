<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="lg">Acorn Cache</flux:heading>
            <flux:text>Clear all compiled Acorn/Laravel cache files.</flux:text>
        </div>
        <flux:button wire:click="clear" wire:loading.attr="disabled" icon="trash">
            <span wire:loading.remove>Clear Cache</span>
            <span wire:loading>Clearing...</span>
        </flux:button>
    </div>

    @if ($ran)
        <flux:callout icon="{{ $success ? 'check-circle' : 'exclamation-triangle' }}"
            variant="{{ $success ? 'success' : 'danger' }}" inline>
            <flux:callout.heading>{{ $success ? 'Cache cleared successfully' : 'Cache clear failed' }}
            </flux:callout.heading>
            <flux:callout.text>
                <pre class="text-xs whitespace-pre-wrap">{{ $output }}</pre>
            </flux:callout.text>
        </flux:callout>
    @endif
</div>
