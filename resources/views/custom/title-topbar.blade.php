<div x-data="{ titleText: document.querySelector('.fi-header-heading')?.textContent || '-' }">
    <div class="custom-title lg:block hidden">
        <h1 class="text-2xl font-bold" x-text="titleText"></h1>
    </div>
</div>
