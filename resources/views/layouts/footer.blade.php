<!-- resources/views/layouts/footer.blade.php -->
<footer class="footer bg-gradient-dark text-light pt-5 pb-4">
    <div class="container">
        <!-- Main Footer Content -->
        <div class="row g-4">
            <!-- Column 1: About & System Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <!-- Logo & System Name -->
                <div class="footer-brand mb-4">
                    <div class="d-flex align-items-center">
                        @if (file_exists(public_path('assets/images/logo-produk-hukum.jpg')))
                            <img src="{{ asset('assets/images/logo-produk-hukum.jpg') }}" alt="Sistem Produk Hukum"
                                class="footer-logo me-3"
                                style="height: 70px; width: auto; border-radius: 8px; border: 2px solid #B71C1C;">
                        @else
                            <div class="footer-icon me-3">
                                <i class="fas fa-gavel fa-3x text-warning"></i>
                            </div>
                        @endif
                        <div>
                            <h4 class="text-white mb-1 fw-bold">PORTAL PRODUK HUKUM</h4>
                            <p class="text-muted mb-0">Sistem Pengelolaan Regulasi & Dokumen Publik</p>
                            <div class="system-tags mt-2">
                                <span class="badge bg-primary me-1">Perdes</span>
                                <span class="badge bg-success me-1">Perkades</span>
                                <span class="badge bg-info">Surat Edaran</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- System Description -->
                <p class="mb-3 text-light-soft">
                    Platform digital terpadu untuk pengelolaan, publikasi, dan arsip
                    produk hukum desa termasuk Peraturan Desa (Perdes), Peraturan Kepala Desa
                    (Perkades), dan Surat Edaran.
                </p>

                <!-- Statistics -->
                <div class="footer-stats row g-2 mb-4">
                    <div class="col-4">
                        <div class="stat-card text-center p-2 bg-dark rounded">
                            <div class="stat-number text-warning fw-bold">
                                {{ \App\Models\Dokumen::count() }}
                            </div>
                            <div class="stat-label small">Dokumen</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-card text-center p-2 bg-dark rounded">
                            <div class="stat-number text-info fw-bold">
                                {{ \App\Models\JenisDokumen::count() }}
                            </div>
                            <div class="stat-label small">Jenis</div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-card text-center p-2 bg-dark rounded">
                            <div class="stat-number text-success fw-bold">
                                {{ \App\Models\KategoriDokumen::count() }}
                            </div>
                            <div class="stat-label small">Kategori</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column 2: Document Types (jenis_dokumen) -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white mb-4 position-relative footer-title">
                    <i class="fas fa-tags me-2"></i>Jenis Dokumen
                </h5>
                <ul class="footer-doc-types list-unstyled">
                    @php
                        $jenisDokumen = \App\Models\JenisDokumen::limit(6)->get();
                    @endphp

                    @forelse($jenisDokumen as $jenis)
                        <li class="mb-2">
                            <!-- PERBAIKAN: ganti $jenis->jenis_id menjadi $jenis->id -->
                            <a href="{{ route('produkHukum.index') }}?jenis={{ $jenis->id }}"
                                class="text-light text-decoration-none doc-type-link">
                                <i class="fas fa-file-alt me-2 text-primary"></i>
                                <span>{{ $jenis->nama_jenis }}</span>
                                @if ($jenis->deskripsi)
                                    <small
                                        class="text-muted d-block ms-4 small">{{ Str::limit($jenis->deskripsi, 40) }}</small>
                                @endif
                            </a>
                        </li>
                    @empty
                        <li class="text-muted">
                            <i class="fas fa-info-circle me-2"></i>
                            Data jenis dokumen belum tersedia
                        </li>
                    @endforelse
                </ul>

                @if ($jenisDokumen->count() > 0)
                    <a href="{{ route('jenis_dokumen.index') }}" class="btn btn-sm btn-outline-light mt-2">
                        <i class="fas fa-list me-1"></i> Semua Jenis
                    </a>
                @endif
            </div>

            <!-- Column 3: Document Categories (kategori_dokumen) -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-white mb-4 position-relative footer-title">
                    <i class="fas fa-folder me-2"></i>Kategori Dokumen
                </h5>
                <ul class="footer-categories list-unstyled">
                    @php
                        $categories = \App\Models\KategoriDokumen::withCount('dokumens')->limit(10)->get();
                    @endphp

                    @forelse($categories as $category)
                        <li class="mb-2">
                            <!-- PERBAIKAN: ganti $category->kategori_id menjadi $category->id -->
                            <a href="{{ route('produkHukum.index') }}?kategori={{ $category->id }}"
                                class="text-light text-decoration-none category-link">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="fas fa-folder-open me-2 text-warning"></i>
                                        <span>{{ $category->nama }}</span>
                                    </div>
                                    <span class="badge bg-secondary">{{ $category->dokumens_count }}</span>
                                </div>
                                @if ($category->deskripsi)
                                    <small
                                        class="text-muted d-block ms-4 small">{{ Str::limit($category->deskripsi, 35) }}</small>
                                @endif
                            </a>
                        </li>
                    @empty
                        <li class="text-muted">
                            <i class="fas fa-info-circle me-2"></i>
                            Data kategori belum tersedia
                        </li>
                    @endforelse
                </ul>

                @if ($categories->count() > 0)
                    <a href="{{ route('kategori_dokumen.index') }}" class="btn btn-sm btn-outline-light mt-2">
                        <i class="fas fa-th-large me-1"></i> Semua Kategori
                    </a>
                @endif
            </div>
            <!-- Column 4: Latest Documents & Contact -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="text-white mb-4 position-relative footer-title">
                    <i class="fas fa-clock me-2"></i>Dokumen Terbaru
                </h5>
                <ul class="footer-latest-docs list-unstyled">
                    @php
                        $latestDocs = \App\Models\Dokumen::latest()->limit(3)->get();
                    @endphp

                    @forelse($latestDocs as $doc)
                        <li class="mb-3">
                            <a href="{{ route('produkHukum.show', $doc->dokumen_id) }}"
                                class="text-light text-decoration-none latest-doc-link">
                                <div class="doc-badge me-2 d-inline-block">
                                    <i class="fas fa-file-pdf text-danger"></i>
                                </div>
                                <div>
                                    <div class="doc-title small text-truncate" style="max-width: 180px;">
                                        {{ $doc->judul }}
                                    </div>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ \Carbon\Carbon::parse($doc->tanggal)->format('d/m/Y') }}
                                    </small>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="text-muted small">
                            <i class="fas fa-file me-2"></i>
                            Belum ada dokumen
                        </li>
                    @endforelse
                </ul>

                <!-- Quick Contact -->
                <div class="mt-4">
                    <h6 class="text-white mb-2 small">
                        <i class="fas fa-headset me-1"></i> Layanan Publik
                    </h6>
                    <div class="contact-info small">
                        <div class="mb-1">
                            <i class="fas fa-envelope me-1 text-primary"></i>
                            <span class="text-muted">dokumen@desa.go.id</span>
                        </div>
                        <div class="mb-1">
                            <i class="fas fa-phone me-1 text-primary"></i>
                            <span class="text-muted">(021) 1234-5678</span>
                        </div>
                        <div>
                            <i class="fas fa-globe me-1 text-primary"></i>
                            <span class="text-muted">produkhukum.desa.go.id</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-4" style="border-color: rgba(255, 215, 0, 0.3);">

        <!-- Bottom Footer with Copyright -->
        <div class="row align-items-center">
            <!-- Copyright & System Info -->
            <div class="col-md-6 mb-3 mb-md-0">
                <div class="d-flex flex-column flex-md-row align-items-center align-items-md-start">
                    <div class="mb-2 mb-md-0 me-md-3">
                        <div class="copyright-section">
                            <div class="d-flex align-items-center">
                                <div class="copyright-icon me-2">
                                    <i class="fas fa-balance-scale text-warning"></i>
                                </div>
                                <div>
                                    <div class="text-white fw-bold mb-1">SISTEM PRODUK HUKUM DESA</div>
                                    <div class="text-muted small">
                                        <i class="fas fa-copyright me-1"></i>
                                        Hak Cipta {{ date('Y') }} - Direktorat Jenderal Peraturan
                                        Perundang-undangan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Status -->
                    <div class="system-status">
                        <div class="d-flex">
                            <span class="badge bg-success me-2">
                                <i class="fas fa-circle me-1"></i>Online
                            </span>
                            <span class="badge bg-info me-2">
                                v{{ config('app.version', '1.0.0') }}
                            </span>
                            <span class="badge bg-warning">
                                <i class="fas fa-database me-1"></i>MySQL
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legal Links -->
            <div class="col-md-6">
                <div class="d-flex justify-content-md-end flex-wrap">
                    <a href="#" class="legal-link text-muted text-decoration-none me-3 mb-2 mb-md-0">
                        <i class="fas fa-shield-alt me-1"></i> Kebijakan Privasi
                    </a>
                    <a href="#" class="legal-link text-muted text-decoration-none me-3 mb-2 mb-md-0">
                        <i class="fas fa-gavel me-1"></i> Legalitas
                    </a>
                    <a href="{{ route('produkHukum.index') }}"
                        class="legal-link text-muted text-decoration-none me-3 mb-2 mb-md-0">
                        <i class="fas fa-sitemap me-1"></i> Peta Situs
                    </a>
                    <a href="#" class="legal-link text-muted text-decoration-none mb-2 mb-md-0">
                        <i class="fas fa-question-circle me-1"></i> FAQ
                    </a>
                </div>
            </div>
        </div>

        <!-- Regulatory Info -->
        <div class="row mt-3">
            <div class="col-12">
                <div class="regulatory-info text-center">
                    <div class="d-flex flex-wrap justify-content-center align-items-center">
                        <!-- Document Counts -->
                        <div class="me-4 mb-2">
                            <span class="badge bg-dark me-2">
                                <i class="fas fa-file-contract me-1"></i>
                                Perdes:
                                {{ \App\Models\Dokumen::whereHas('jenisDokumen', function ($q) {
                                    $q->where('nama_jenis', 'like', '%Perdes%');
                                })->count() }}
                            </span>
                            <span class="badge bg-dark me-2">
                                <i class="fas fa-file-signature me-1"></i>
                                Perkades:
                                {{ \App\Models\Dokumen::whereHas('jenisDokumen', function ($q) {
                                    $q->where('nama_jenis', 'like', '%Perkades%');
                                })->count() }}
                            </span>
                            <span class="badge bg-dark">
                                <i class="fas fa-file-invoice me-1"></i>
                                Surat Edaran:
                                {{ \App\Models\Dokumen::whereHas('jenisDokumen', function ($q) {
                                    $q->where('nama_jenis', 'like', '%Surat Edaran%');
                                })->count() }}
                            </span>
                        </div>

                        <!-- Update Info -->
                        <div class="text-muted small mb-2">
                            <i class="fas fa-sync-alt me-1"></i>
                            Terakhir diperbarui: {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Regulatory Compliance Notice -->
        <div class="row mt-2">
            <div class="col-12">
                <div class="compliance-notice text-center">
                    <small class="text-muted">
                        <i class="fas fa-exclamation-triangle me-1 text-warning"></i>
                        Sistem ini mematuhi Undang-Undang Keterbukaan Informasi Publik
                        dan diperbarui sesuai dengan perubahan regulasi terbaru.
                    </small>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Styles for Legal Document Footer -->
<style>
    .footer {
        background: linear-gradient(135deg, #0c1a2d 0%, #1a2b3c 100%);
        border-top: 4px solid #B71C1C;
        position: relative;
    }

    .footer::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #B71C1C 0%, #FFD700 50%, #B71C1C 100%);
    }

    .footer-logo {
        box-shadow: 0 4px 15px rgba(183, 28, 28, 0.3);
        transition: transform 0.3s ease;
    }

    .footer-logo:hover {
        transform: scale(1.05);
    }

    .footer-icon {
        background: rgba(183, 28, 28, 0.1);
        padding: 15px;
        border-radius: 10px;
        border: 2px solid #B71C1C;
    }

    .system-tags .badge {
        font-size: 0.7em;
        padding: 0.25em 0.6em;
    }

    .stat-card {
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 215, 0, 0.1);
    }

    .stat-card:hover {
        border-color: #FFD700;
        transform: translateY(-2px);
    }

    .stat-number {
        font-size: 1.2rem;
    }

    .stat-label {
        color: rgba(255, 255, 255, 0.7);
    }

    .footer-title {
        padding-bottom: 10px;
        border-bottom: 2px solid #B71C1C;
        display: inline-block;
    }

    .footer-doc-types li,
    .footer-categories li,
    .footer-latest-docs li {
        padding: 8px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .footer-doc-types li:last-child,
    .footer-categories li:last-child,
    .footer-latest-docs li:last-child {
        border-bottom: none;
    }

    .doc-type-link,
    .category-link,
    .latest-doc-link {
        transition: all 0.3s ease;
        display: block;
    }

    .doc-type-link:hover,
    .category-link:hover,
    .latest-doc-link:hover {
        color: #FFD700 !important;
        padding-left: 5px;
    }

    .doc-type-link:hover i,
    .category-link:hover i {
        color: #FFD700 !important;
    }

    .doc-badge {
        background: rgba(220, 53, 69, 0.1);
        padding: 5px 8px;
        border-radius: 4px;
    }

    .doc-title {
        font-weight: 500;
    }

    .contact-info {
        background: rgba(255, 255, 255, 0.05);
        padding: 10px;
        border-radius: 5px;
        border-left: 3px solid #B71C1C;
    }

    .copyright-section {
        background: rgba(255, 255, 255, 0.05);
        padding: 10px 15px;
        border-radius: 5px;
    }

    .copyright-icon {
        width: 40px;
        height: 40px;
        background: rgba(255, 215, 0, 0.1);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .legal-link {
        transition: all 0.3s ease;
        padding: 5px 0;
    }

    .legal-link:hover {
        color: #FFD700 !important;
    }

    .regulatory-info {
        background: rgba(0, 0, 0, 0.2);
        padding: 10px;
        border-radius: 5px;
        border: 1px solid rgba(255, 215, 0, 0.1);
    }

    .compliance-notice {
        background: rgba(255, 193, 7, 0.1);
        padding: 8px;
        border-radius: 5px;
        border: 1px solid rgba(255, 193, 7, 0.2);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .footer {
            text-align: center;
        }

        .footer-brand .d-flex {
            justify-content: center;
            flex-direction: column;
        }

        .footer-icon {
            margin-bottom: 15px;
        }

        .system-tags {
            justify-content: center;
        }

        .footer-stats .col-4 {
            margin-bottom: 10px;
        }

        .copyright-section .d-flex {
            justify-content: center;
        }

        .regulatory-info .d-flex {
            justify-content: center !important;
        }
    }

    @media (max-width: 576px) {
        .footer-stats .col-4 {
            width: 100%;
            margin-bottom: 10px;
        }

        .legal-link {
            margin: 5px;
        }
    }
</style>

<!-- JavaScript for Interactive Features -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click animation to document links
        const docLinks = document.querySelectorAll('.doc-type-link, .category-link, .latest-doc-link');
        docLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                // Add loading indicator for document navigation
                const loadingOverlay = document.createElement('div');
                loadingOverlay.className = 'loading-overlay';
                loadingOverlay.innerHTML =
                    '<i class="fas fa-spinner fa-spin fa-2x text-warning"></i>';
                loadingOverlay.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,0.7);
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 9999;
                `;
                document.body.appendChild(loadingOverlay);

                // Remove after 1 second (or after page loads)
                setTimeout(() => {
                    if (document.body.contains(loadingOverlay)) {
                        document.body.removeChild(loadingOverlay);
                    }
                }, 1000);
            });
        });

        // Add hover effect to stat cards
        const statCards = document.querySelectorAll('.stat-card');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 5px 15px rgba(255, 215, 0, 0.2)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = 'none';
            });
        });

        // Update live time in footer
        function updateLiveTime() {
            const now = new Date();
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                timeZone: 'Asia/Jakarta'
            };

            const timeElement = document.querySelector('.text-muted .fa-sync-alt');
            if (timeElement && timeElement.parentElement) {
                const timeString = now.toLocaleDateString('id-ID', options);
                timeElement.parentElement.innerHTML =
                    `<i class="fas fa-sync-alt me-1"></i>Terakhir diperbarui: ${timeString}`;
            }
        }

        // Update time every minute
        updateLiveTime();
        setInterval(updateLiveTime, 60000);

        // Add tooltip to badges
        const badges = document.querySelectorAll('.badge');
        badges.forEach(badge => {
            badge.setAttribute('data-bs-toggle', 'tooltip');

            // Set tooltip content based on badge content
            if (badge.textContent.includes('Perdes')) {
                badge.setAttribute('title', 'Peraturan Desa');
            } else if (badge.textContent.includes('Perkades')) {
                badge.setAttribute('title', 'Peraturan Kepala Desa');
            } else if (badge.textContent.includes('Surat Edaran')) {
                badge.setAttribute('title', 'Surat Edaran Kepala Desa');
            }
        });

        // Initialize Bootstrap tooltips
        if (typeof bootstrap !== 'undefined') {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    });
</script>
