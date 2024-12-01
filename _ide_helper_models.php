<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $perumahan_id
 * @property string $nama_blok
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Perumahan $perumahan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Warga> $warga
 * @property-read int|null $warga_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereNamaBlok($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok wherePerumahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Blok extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_iuran
 * @property string $nominal
 * @property string|null $deskripsi
 * @property string $periode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransaksiIuran> $transaksiIuran
 * @property-read int|null $transaksi_iuran_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereNamaIuran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran wherePeriode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Iuran extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama_perumahan
 * @property string $alamat
 * @property string $kota
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blok> $blok
 * @property-read int|null $blok_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereKota($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereNamaPerumahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Perumahan extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $warga_id
 * @property int $iuran_id
 * @property string $tanggal_bayar
 * @property string $status_bayar
 * @property string $metode_bayar
 * @property string|null $bukti_bayar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Iuran $iuran
 * @property-read \App\Models\Warga $warga
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereBuktiBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereIuranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereMetodeBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereStatusBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereTanggalBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereWargaId($value)
 * @mixin \Eloquent
 */
	class TransaksiIuran extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \Filament\Models\Contracts\FilamentUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property int $perumahan_id
 * @property int $blok_id
 * @property string $nomor_rumah
 * @property string $no_telepon
 * @property string|null $email
 * @property string $tanggal_daftar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blok $blok
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransaksiIuran> $transaksiIuran
 * @property-read int|null $transaksi_iuran_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereBlokId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereNomorRumah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga wherePerumahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereTanggalDaftar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Warga extends \Eloquent {}
}

