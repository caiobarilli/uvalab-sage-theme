<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div>
            <flux:heading size="lg">Seeder</flux:heading>
            <flux:text>Run all database seeders.</flux:text>
        </div>
        <flux:button wire:click="run" wire:loading.attr="disabled" icon="circle-stack">
            <span wire:loading.remove>Run Seeders</span>
            <span wire:loading>Running...</span>
        </flux:button>
    </div>

    @if ($ran)
        <flux:callout icon="{{ $success ? 'check-circle' : 'exclamation-triangle' }}"
            variant="{{ $success ? 'success' : 'danger' }}" inline>
            <flux:callout.heading>{{ $success ? 'Seeders ran successfully' : 'Seeder failed' }}</flux:callout.heading>
            <flux:callout.text>
                <pre class="text-xs whitespace-pre-wrap">{{ $output }}</pre>
            </flux:callout.text>
        </flux:callout>
    @endif
</div>
