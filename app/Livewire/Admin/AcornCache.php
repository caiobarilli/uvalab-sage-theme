<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AcornCache extends Component
{
    public string $output = '';

    public bool $success = false;

    public bool $ran = false;

    public function clear(): void
    {
        if (! current_user_can('manage_options')) {

            $this->output = 'Permission denied.';

            $this->success = false;

            $this->ran = true;

            return;
        }

        $wp_cli = trim(shell_exec('which wp'));

        $cmd = $wp_cli.' acorn optimize:clear --path='.escapeshellarg(ABSPATH).' 2>&1';

        $result = shell_exec($cmd);

        $this->output = trim($result ?? 'No output.');

        $this->success = str_contains($this->output, 'DONE') || str_contains($this->output, 'cleared') || str_contains($this->output, 'success');

        $this->ran = true;
    }

    public function render()
    {
        return view('livewire.admin.acorn-cache');
    }
}
