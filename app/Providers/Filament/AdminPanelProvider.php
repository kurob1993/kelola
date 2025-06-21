<?php

namespace App\Providers\Filament;

use App\Livewire\StatsOverview;
use App\Livewire\TransaksiIuranChart;
use App\Livewire\TransaksiIuranTable;
use Filament\FontProviders\GoogleFontProvider;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Hydrat\TableLayoutToggle\TableLayoutTogglePlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $isRtl = $this->getDirectionFromLocale();

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->passwordReset()
            ->emailVerification()
            ->profile(isSimple: false)
            ->font('Plus Jakarta Sans', provider: GoogleFontProvider::class)
            ->colors([
                'primary' => Color::Indigo
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                StatsOverview::class,
                TransaksiIuranChart::class,
                TransaksiIuranTable::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->sidebarWidth('16rem')
            ->maxContentWidth(MaxWidth::Full)
//            ->userMenuItems([
//                'profile' => MenuItem::make()->label('Edit profile'),
//                'logout' => MenuItem::make()->label('Logout'),
//                MenuItem::make()
//                    ->label('Settings')
//                    ->icon('heroicon-o-cog-6-tooth'),
//            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->sidebarCollapsibleOnDesktop()
            ->collapsedSidebarWidth('9rem')
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn() => view('custom.title-topbar')
            )
            ->icons([
                'panels::sidebar.collapse-button' => 'heroicon-o-bars-3-bottom-' . ($isRtl ? 'right' : 'left'),
                'panels::sidebar.expand-button' => 'heroicon-o-arrow-' . ($isRtl ? 'left' : 'right'),
            ])
            ->plugins([
                TableLayoutTogglePlugin::make()
                    ->setDefaultLayout('list') // default layout to be displayed
                    ->shareLayoutBetweenPages(false) // allow all tables to share the layout option (requires persistLayoutInLocalStorage to be true)
                    ->displayToggleAction() // used to display the toggle action button automatically
                    ->toggleActionHook('tables::toolbar.search.after') // chose the Filament view hook to render the button on
                    ->listLayoutButtonIcon('heroicon-o-list-bullet')
                    ->gridLayoutButtonIcon('heroicon-o-squares-2x2'),
                FilamentShieldPlugin::make()
                    ->gridColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 2
                    ])
                    ->sectionColumnSpan(1)
                    ->checkboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                        'lg' => 4,
                    ])
                    ->resourceCheckboxListColumns([
                        'default' => 1,
                        'sm' => 2,
                    ]),
            ])
            ->viteTheme('resources/css/filament/admin/theme.css');
    }

    protected function getDirectionFromLocale()
    {
        $rtlLocales = [
            'ar', 'fa', 'he', 'ur', 'dv', 'ku', 'ps', 'sd', 'ug', 'yi'
        ];

        return in_array(app()->getLocale(), $rtlLocales);
    }
}
