<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Seeder extends Component
{
    public string $output = '';

    public bool $success = false;

    public bool $ran = false;

    public function run(): void
    {
        if (! current_user_can('manage_options')) {
            $this->output = 'Permission denied.';
            $this->success = false;
            $this->ran = true;

            return;
        }

        $wp_cli = trim(shell_exec('which wp'));
        $cmd = $wp_cli.' acorn db:seed --path='.escapeshellarg(ABSPATH).' 2>&1';
        $result = shell_exec($cmd);

        $this->output = trim($result ?? 'No output.');
        $this->success = str_contains($this->output, 'Seeding') || str_contains($this->output, 'Done') || str_contains($this->output, 'success');
        $this->ran = true;
    }

    public function render()
    {
        return view('livewire.admin.seeder');
    }
}
