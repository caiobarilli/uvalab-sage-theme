# Uvalab Sage Theme

> A modern WooCommerce theme built with Sage 11, Acorn 5, Livewire 4 and Flux UI.

![Uvalab Screenshot](./screenshot.png)

🎨 [View Design on Figma](https://www.figma.com/design/dbXy3NH2VlwRvZaiewkWrF/Uvalab-V1?node-id=0-1&t=j6UwpDZGMeiJ5Clk-1)

---

## Stack

| Technology       | Version           |
| ---------------- | ----------------- |
| PHP              | >= 8.2            |
| Sage             | 11                |
| Acorn            | ^5.1 (Laravel 12) |
| Livewire         | ^4.2              |
| Flux UI          | ^2.13             |
| Acorn FSE Helper | ^1.0              |
| Tailwind CSS     | ^4.0              |
| Vite             | ^8.0              |
| Swiper           | ^12.0             |
| Node.js          | >= 20.0.0         |

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

| Container       | Role                                    |
| --------------- | --------------------------------------- |
| `bedrock-nginx` | Web server                              |
| `bedrock-php`   | PHP-FPM + WordPress + Composer + WP-CLI |
| `bedrock-mysql` | Database                                |
| `bedrock-node`  | Vite + npm build                        |

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
cd /var/www/html/web/app/themes → uvalab
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

| Section     | URL                          |
| ----------- | ---------------------------- |
| Dashboard   | `/uvalab-admin`              |
| Hero Slides | `/uvalab-admin/sliders/hero` |

---

## Authentication

The theme includes a custom authentication system built with Livewire and Flux UI, replacing the default WooCommerce My Account page.

### Auth Routes

| Route       | Component  | Description           |
| ----------- | ---------- | --------------------- |
| `/login`    | `Login`    | Customer login        |
| `/register` | `Register` | Customer registration |
| `/logout`   | —          | Ends the session      |

### Customer Routes

The customer area base path is resolved dynamically from `wc_get_page_permalink('myaccount')`, falling back to `/my-account`.

| Route                            | Component     | Description          |
| -------------------------------- | ------------- | -------------------- |
| `{base}`                         | `Dashboard`   | Customer dashboard   |
| `{base}/orders`                  | `Orders`      | Order history        |
| `{base}/view-order/{orderId}`    | `ViewOrder`   | Single order details |
| `{base}/downloads`               | `Downloads`   | Digital downloads    |
| `{base}/edit-address`            | `EditAddress`  | Address management   |
| `{base}/edit-account`            | `EditAccount`  | Account settings     |

### Customer Layout

The customer area uses `layouts/app.blade.php` with a Flux UI collapsible sidebar:

| Icon                             | Label           | Route                    |
| -------------------------------- | --------------- | ------------------------ |
| `home`                           | Dashboard       | `customer.account`       |
| `shopping-bag`                   | Orders          | `customer.orders`        |
| `arrow-down-tray`               | Downloads       | `customer.downloads`     |
| `map-pin`                        | Addresses       | `customer.edit-address`  |
| `user-circle`                    | Account details | `customer.edit-account`  |
| `arrow-right-start-on-rectangle` | Log out         | `auth.logout`            |

The layout includes the FSE header (`@blockpart('header')`) and footer (`@blockpart('footer')`), and constrains content width to `--wp--style--global--content-size`.

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

## Typography

The theme uses **Roboto** as the default font family, loaded locally via `woff2` files.

### Available variants

| Weight | Style  | File                  |
| ------ | ------ | --------------------- |
| 300    | Normal | Roboto-Light.woff2    |
| 400    | Normal | Roboto-Regular.woff2  |
| 400    | Italic | Roboto-Italic.woff2   |
| 500    | Normal | Roboto-Medium.woff2   |
| 700    | Normal | Roboto-Bold.woff2     |
| 900    | Normal | Roboto-Black.woff2    |

Font files are located at `resources/fonts/roboto/` and registered in `theme.json` via `fontFace`. No CDN dependency.

---

## Code Quality

This project uses **PHPStan**, **Husky**, and **Lint-Staged** to ensure code quality and prevent bad commits.

### PHPStan

Run static analysis:

```bash
  composer phpstan
```

> ⚠️ WordPress and Flux methods may be ignored via `phpstan.neon` when not resolvable by static analysis.

---

## Git Hooks (Husky + Lint-Staged)

Pre-commit hooks are configured to automatically run checks before each commit.

### What runs on commit

- Lint-staged executes tasks only on staged files
- Prevents commits if any task fails

### Install hooks (if needed)

```bash
  npm install
  npx husky install
```

### Lint-Staged behavior

If no staged files match configured patterns, commit proceeds normally.

---

## Available Scripts

```bash
  npm run build
  npm run dev
  npm run lint
```

> ⚠️ No `npm test` script is defined by default.

---

## PHPStan Notes

- WordPress functions are supported via `wordpress-stubs`
- WooCommerce functions via `woocommerce-stubs`
- Some dynamic APIs (e.g. Flux UI) may require:
  - stubs **or**
  - targeted ignores in `phpstan.neon`

---

## Testing (Pest)

This project uses Pest PHP for automated testing.

Run tests

```bash
./vendor/bin/pest
```

### Test structure

- tests/Feature → integration / application behavior
- tests/Unit → isolated logic tests

Example

```php
it('aplicação sobe sem erros', function () {
    expect(\Roots\Acorn\Application::getInstance())->not->toBeNull();
});
```

### Notes

- Tests are designed to run without full WordPress boot
- Focus is on application integrity and core functionality
- Avoid relying on WordPress global functions unless properly mocked

### Pre-push Hooks

Before pushing code, the following checks are executed automatically:

- PHPStan (static analysis)
- Pest (tests)
- Vite build

If any step fails, the push is aborted.

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
wp core install --url="http://localhost:8080" --title="UvaLab" --admin_user="uva" --admin_password="uva" --admin_email="uva@uva.com" --skip-email

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

## Architecture Summary

### Providers

- **ThemeServiceProvider** — Extends `SageServiceProvider`, executes `CustomerMiddleware` on boot
- **AdminMenuServiceProvider** — Registers "UvaLab" menu in wp-admin with iframe pointing to `/uvalab-admin`, "Hero Slides" submenu linking to `edit.php?post_type=hero_slide`, JS to sync iframe height
- **PostTypesServiceProvider** — Registers CPT `hero_slide` (non-public, with UI, no menu, REST enabled, supports title/editor/thumbnail/page-attributes)
- **ShortcodesServiceProvider** — Generic `[livewire component="..."]` shortcode, processes shortcodes in core blocks, strips `<p>/<br>` from wpautop around Livewire output
- **LivewireAssetsServiceProvider** — Injects Livewire scripts in `wp_footer`

### Controllers

- **ThemeOptionsController** — Protects admin routes with `current_user_can('manage_options')`, renders views `admin.theme-options` and `admin.sliders.hero`
- **ComingSoonController** — Renders `coming-soon` view

### Middleware

- **CustomerMiddleware** — On `admin_init`, redirects `subscriber` role to the WooCommerce My Account page (blocks wp-admin access)

### Livewire — Auth

- **Login** — `wp_signon` + `wp_set_auth_cookie`, redirects to My Account, uses `auth` layout
- **Register** — `wp_create_user` with `subscriber` role, validates duplicate username/email, redirects to My Account, uses `auth` layout

### Livewire — Customer

- **Dashboard** — Checks login status, displays user `displayName`

### Livewire — Shop

- **ProductsList** — Lists WooCommerce products with pagination, listens to `filters-updated` event from `FilterProducts`, supports subcategory and price range filtering
- **FilterProducts** — Fetches parent categories and subcategories from `product_cat`, dispatches `filters-updated` event with subcategories and price
- **ShopMenu** — Displays WooCommerce cart item count
- **Quote** — Simple component with a static quote string

### Livewire — Slider

- **Slider** — Fetches `hero_slide` posts ordered by `menu_order`, builds slides array with title/content

### Livewire — Admin

- **HeroSlider** — Lists slides (publish + draft), delete confirmation modal with Flux toast notifications
- **SystemStatus** — Displays status: WooCommerce installed/version, coming soon active, My Account page configured, permalink OK, product count
- **AcornCache** — Runs `wp acorn optimize:clear` via shell
- **Seeder** — Runs `wp acorn db:seed` via shell

### Config / Setup

- **setup.php** — Menus (primary/footer), sidebars, theme supports (thumbnails, html5, responsive-embeds), injects editor CSS/JS via Vite, disables `woocommerce_store_pages_only` and `woocommerce_private_link` to prevent redirect loops
- **filters.php** — Excerpt "Continued" link, redirects to `/coming-soon` when `woocommerce_coming_soon === 'yes'` and user is not admin
- **composer.json** — PHP ≥8.2, deps: `livewire/flux ^2.13`, `livewire/livewire ^4.2`, `roots/acorn ^5.1`, `roots/acorn-fse-helper ^1.0`; dev: larastan, pint, pest, WP/WC stubs
- **config/fse.php** — Vite asset injection enabled for FSE
- **config/livewire.php** — Default layout `layouts::app`, namespace `App\Livewire`, inject_assets true, tailwind pagination
- **theme.json** — Version 3, contentSize 68rem, custom palette (primary `#561922`, wine/bordeaux tones), Roboto font (300-900)
- **vite.config.js** — Vite 8 + Tailwind CSS 4 plugin + laravel-vite-plugin + @roots/vite-plugin, HMR on localhost:5173, aliases @scripts/@styles/@fonts/@images

### Layouts

- **app.blade.php** — Customer layout with Flux UI sidebar (Dashboard, Orders, Downloads, Addresses, Account details, Logout)
- **admin.blade.php** — Admin iframe layout with Flux UI sidebar (Theme, Hero Slides), ResizeObserver script for iframe height sync
- **auth.blade.php** — Split-screen layout: form on the left, background image + Caleb Porzio quote on the right

### Seeders

- **DatabaseSeeder** — Calls `HeroSlideSeeder`
- **HeroSlideSeeder** — Inserts 3 hero slides with Gutenberg blocks (layout with subtitle, title, description, CTA button and placeholder image)

---

## Notes

- Always run `composer dump-autoload` after moving or creating PHP files.
- The `api` prefix is added automatically by Acorn — do not use `Route::prefix('api')` in `routes/api.php`.
- Always use `__DIR__` to reference files inside the theme — `base_path()` points to Bedrock root.
- `Flux::toast()` requires Flux UI Pro.
- WordPress functions are supported via `wordpress-stubs` and WooCommerce via `woocommerce-stubs` for PHPStan.
- Some dynamic APIs (e.g. Flux UI) may require stubs or targeted ignores in `phpstan.neon`.
- Tests are designed to run without full WordPress boot — avoid relying on WordPress global functions unless properly mocked.
- The theme disables `woocommerce_store_pages_only` and `woocommerce_private_link` via `pre_option_*` filters in `setup.php` to prevent redirect loops when coming soon mode is enabled.
- The `ShortcodesServiceProvider` wraps Livewire output in comment markers and strips `wpautop` artifacts (`<p>`, `<br>`) to prevent layout breakage.
- The admin panel (`/uvalab-admin`) runs inside an iframe in `wp-admin` — the `admin.blade.php` layout uses `ResizeObserver` + `postMessage` to sync height with the parent frame.
- `CustomerMiddleware` is executed on every request via `ThemeServiceProvider::boot()` — it hooks into `admin_init` to block `subscriber` role from `wp-admin`.
- Pre-push hooks run PHPStan, Pest and Vite build — if any step fails, the push is aborted.

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
