<div class="flex justify-center">
    @if($data)
        <img src="{{ $imageUrl }}" alt="Bukti Bayar" class="rounded-lg shadow-lg w-auto max-h-[500px] object-contain">
    @else
        <h1>Tidak ada data</h1>
    @endif
</div>
