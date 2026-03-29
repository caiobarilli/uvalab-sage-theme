# Uvalab Sage Theme

> A modern WooCommerce theme built with Sage 11, Acorn 5, Livewire 4 and Flux UI.

![Uvalab Screenshot](./screenshot.png)

🎨 [View Design on Figma](https://www.figma.com/design/dbXy3NH2VlwRvZaiewkWrF/Uvalab-V1?node-id=0-1&t=j6UwpDZGMeiJ5Clk-1)

---

## Stack

| Technology | Version |
|---|---|
| PHP | >= 8.2 |
| Sage | 11 |
| Acorn | ^5.1 (Laravel 12) |
| Livewire | ^4.2 |
| Flux UI | ^2.13 |
| Acorn FSE Helper | ^1.0 |
| Tailwind CSS | ^4.0 |
| Vite | ^8.0 |
| Swiper | ^12.0 |
| Node.js | >= 20.0.0 |

---

## Requirements

- [WordPress](https://wordpress.org/) >= 6.6
- [WooCommerce](https://woocommerce.com/) >= 8.0
- [Bedrock](https://roots.io/bedrock/) _(recommended)_
- [terraform-bedrock](https://github.com/caiobarilli/terraform-bedrock) _(recommended)_

> ⚠️ This theme requires WooCommerce to be installed and activated.
> You can install it via the [WordPress plugin directory](http://localhost:8080/wp-admin/plugin-install.php?s=woocommerce&tab=search&type=term)
> or via Bedrock: `"wpackagist-plugin/woocommerce": "^10.0"`.

---

## Development Environment

This theme is designed to run inside the Docker environment provisioned by:

**[caiobarilli/terraform-bedrock](https://github.com/caiobarilli/terraform-bedrock)**

| Container | Role |
|---|---|
| `bedrock-nginx` | Web server |
| `bedrock-php` | PHP-FPM + WordPress + Composer + WP-CLI |
| `bedrock-mysql` | Database |
| `bedrock-node` | Vite + npm build |

> The theme also works on a standard WordPress installation without Bedrock.

---

## Installation

### 1. Provision the environment

Follow the instructions at [terraform-bedrock](https://github.com/caiobarilli/terraform-bedrock) to spin up the Docker environment.

### 2. Install Bedrock
```bash
docker exec -it bedrock-php bash
composer create-project roots/bedrock . --prefer-dist
```

### 3. Install the theme
```bash
cd /var/www/html/web/app/themes -> uvalab*
```

### 4. Install PHP dependencies
```bash
cd uvalab
composer install
```

### 5. Install Node dependencies
```bash
docker exec -it bedrock-node bash
cd /var/www/html/web/app/themes/uvalab
npm install
npm run build
```

### 6. Configure the environment

Edit Bedrock's `.env`:
```env
DB_NAME=wordpress
DB_USER=wordpress
DB_PASSWORD=wordpress
DB_HOST=bedrock-mysql
WP_HOME=http://localhost:8080
```

### 7. Generate APP_KEY
```bash
wp acorn key:generate
```

### 8. Run migrations
```bash
wp acorn migrate
```

### 9. Run seeders (optional)
```bash
wp acorn db:seed
```

---

## Admin Panel


The theme registers a custom **UvaLab** menu in the WordPress admin panel, powered by Flux UI via iframe routing.

Access at: `http://localhost:8080/wp-admin/admin.php?page=uvalab-options`

### Available sections

| Section | URL |
|---|---|
| Dashboard | `/uvalab-admin` |
| Hero Slides | `/uvalab-admin/sliders/hero` |

---

## Authentication

The theme includes a custom authentication system built with Livewire and Flux UI, replacing the default WooCommerce My Account page.

### Routes

| Route | Description |
|---|---|
| `/login` | Customer login |
| `/register` | Customer registration |
| `/logout` | Ends the session |
| `/my-account` | Customer dashboard (requires login) |

### WooCommerce My Account

Replace the default `[woocommerce_my_account]` shortcode with:
```
[uvalab_my_account]
```

Edit the **My Account** page in WordPress admin and swap the shortcode to use the custom Livewire-powered dashboard.

### Middleware

`CustomerMiddleware` blocks users with the `subscriber` role from accessing `wp-admin`, redirecting them to the WooCommerce My Account page.

---

## Livewire

### Config `config/livewire.php`
```php
'make_command' => [
    'type' => 'class',
    'emoji' => false,
],
```

### Create a component
```bash
wp acorn make:livewire ComponentName
```

### Use in a Blade view
```blade
<livewire:component-name />
```

### Use via WordPress shortcode
```
[livewire component="component-name"]
```

---

## FSE (Full Site Editing)

Block templates are located in `templates/`. Blade directives are available via `roots/acorn-fse-helper`:
```blade
@blocks
  <!-- wp:paragraph -->
  <p>Block content</p>
  <!-- /wp:paragraph -->
@endblocks

@blockpart('header')
```

---

## Useful Commands

### Composer
```bash
composer install
composer dump-autoload
```

### Acorn / WP-CLI
```bash
wp acorn list
wp acorn key:generate
wp acorn migrate
wp acorn migrate:rollback
wp acorn db:seed
wp acorn make:livewire ComponentName
wp acorn make:model Models/ModelName
wp acorn make:migration create_table_name
wp acorn make:controller Admin/ControllerName
wp acorn route:list
wp acorn optimize:clear
```

### Node
```bash
npm install
npm run build
npm run dev
```

### Wipe all data and start fresh
```bash

# 1. Wipe
wp acorn db:wipe

# 2. Recriar tabelas do WordPress
wp core install --url="http://localhost:8080" --title="wordpress" --admin_user="wordpress" --admin_password="wordpress" --admin_email="wordpress@wordpress.com" --skip-email

# 3. Ativar tema
wp theme activate uvalab

# 4. Ativar WooCommerce
wp plugin activate woocommerce
wp option update woocommerce_onboarding_profile '{"skipped":true}' --format=json
wp option update woocommerce_coming_soon no

# 6. Permalinks
wp rewrite structure '/%postname%/' --hard

# Rodar Seed
wp acorn db:seed

# 6. Limpar cache
wp acorn optimize:clear

```

---

## Notes

- WooCommerce must be set to **Live** mode to avoid breaking store pages. Go to **WooCommerce > Settings > Site visibility** and set it to **Live**.
- Always run `composer dump-autoload` after moving or creating PHP files.
- `make:model` creates the file at `app/ModelName.php` — move to `app/Models/` manually if needed.
- The `api` prefix is added automatically by Acorn — do not use `Route::prefix('api')` in `routes/api.php`.
- Always use `__DIR__` to reference files inside the theme — `base_path()` points to Bedrock root.
- `Flux::toast()` requires Flux UI Pro.

---

## References

- [Roots Sage](https://roots.io/sage/)
- [Roots Acorn](https://roots.io/acorn/)
- [Acorn — Using Livewire with WordPress](https://roots.io/acorn/docs/using-livewire-with-wordpress/)
- [Livewire Documentation](https://livewire.laravel.com/docs)
- [Flux UI](https://fluxui.dev)
- [Acorn FSE Helper](https://github.com/roots/acorn-fse-helper)
- [Swiper](https://swiperjs.com)
- [terraform-bedrock](https://github.com/caiobarilli/terraform-bedrock)
