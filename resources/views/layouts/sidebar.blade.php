    <!-- Sidebar -->
    <div class="adminx-sidebar expand-hover push">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="/dashboard" class="sidebar-nav-link active">
                    <span class="sidebar-nav-icon">
                        <i data-feather="home"></i>
                    </span>
                    <span class="sidebar-nav-name">
                        Dashboard
                    </span>
                    <span class="sidebar-nav-end">

                    </span>
                </a>
            </li>
            @if (Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff'))
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false"
                        aria-controls="example">
                        <span class="sidebar-nav-icon">
                            <i data-feather="pie-chart"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            Data
                        </span>
                        <span class="sidebar-nav-end">
                            <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                        </span>
                    </a>

                    <ul class="sidebar-sub-nav collapse" id="example">
                        <li class="sidebar-nav-item">
                            <a href="/data-asisten" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Da
                                </span>
                                <span class="sidebar-nav-name">
                                    Data Asisten
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-nav-item">
                            <a href="/data-kelas" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Dk
                                </span>
                                <span class="sidebar-nav-name">
                                    Data Kelas
                                </span>
                            </a>
                        </li>

                        <li class="sidebar-nav-item">
                            <a href="/data-materi" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Dm
                                </span>
                                <span class="sidebar-nav-name">
                                    Data Materi
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if (Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff' || Auth::user()->role == 'pj'))
                <li class="sidebar-nav-item">
                    <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false"
                        aria-controls="navTables">
                        <span class="sidebar-nav-icon">
                            <i data-feather="align-justify"></i>
                        </span>
                        <span class="sidebar-nav-name">
                            Generator
                        </span>
                        <span class="sidebar-nav-end">
                            <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                        </span>
                    </a>

                    <ul class="sidebar-sub-nav collapse" id="navTables">
                        <li class="sidebar-nav-item">
                            <a href="/code-generator" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Cg
                                </span>
                                <span class="sidebar-nav-name">
                                    Code Generator
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="sidebar-nav-item">
                <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navForms" aria-expanded="false"
                    aria-controls="navForms">
                    <span class="sidebar-nav-icon">
                        <i data-feather="edit"></i>
                    </span>
                    <span class="sidebar-nav-name">
                        Report
                    </span>
                    <span class="sidebar-nav-end">
                        <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                    </span>
                </a>

                <ul class="sidebar-sub-nav collapse" id="navForms">
                    @if (Auth::user() && (Auth::user()->role == 'admin' || Auth::user()->role == 'staff'))
                        <li class="sidebar-nav-item">
                            <a href="/report-absen" class="sidebar-nav-link">
                                <span class="sidebar-nav-abbr">
                                    Re
                                </span>
                                <span class="sidebar-nav-name">
                                    Report
                                </span>
                            </a>
                        </li>
                    @endif

                    <li class="sidebar-nav-item">
                        <a href="/riwayat-absen" class="sidebar-nav-link">
                            <span class="sidebar-nav-abbr">
                                Ra
                            </span>
                            <span class="sidebar-nav-name">
                                Riwayat Absen
                            </span>
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
