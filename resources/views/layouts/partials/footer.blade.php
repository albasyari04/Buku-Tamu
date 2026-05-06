{{-- layouts/partials/footer.blade.php --}}
<footer class="mt-4 pt-3" style="border-top: 1px solid var(--border);">
    <div class="container-fluid px-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
            <p class="mb-0" style="font-size: 0.75rem; color: var(--text-muted);">
                &copy; {{ date('Y') }} <strong style="color: var(--text-secondary);">BKPSDM OKU TIMUR</strong> — Sistem Buku Tamu Digital
            </p>
            <div class="d-flex align-items-center gap-3">
                <span style="font-size: 0.7rem; color: var(--text-muted);">
                    <i class="fas fa-shield-alt me-1"></i> Secure Connection
                </span>
                <a href="#" style="font-size: 0.7rem; color: var(--text-muted); text-decoration: none;" class="hover-primary">Bantuan</a>
                <a href="#" style="font-size: 0.7rem; color: var(--text-muted); text-decoration: none;" class="hover-primary">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>

<style>
.hover-primary:hover {
    color: var(--primary) !important;
}
</style>