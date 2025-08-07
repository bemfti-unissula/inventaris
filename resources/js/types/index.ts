export interface User {
    id: string;
    name: string;
    email: string;
    email_verified_at: string;
    role: 'admin' | 'user';
}

export interface Barang {
    _id: string;
    nama_barang: string;
    deskripsi: string;
    kategori: string;
    stok: number;
    total_dipinjam: number;
    total_dimiliki?: number;
    kondisi?: string;
    gambar?: {
        path: string;
        url: string;
    } | string;
    created_at: string;
    updated_at: string;
}

export interface PaginatedData<T> {
    data: T[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    from: number;
    to: number;
    prev_page_url: string | null;
    next_page_url: string | null;
    links: {
        url: string | null;
        label: string;
        active: boolean;
    }[];
}

export interface PageProps<T extends Record<string, unknown> = Record<string, unknown>> {
    auth: {
        user: User;
    };
    flash?: {
        success?: string;
        error?: string;
        warning?: string;
        info?: string;
    };
    errors?: Record<string, string>;
}

export interface BarangIndexProps extends PageProps {
    barangs: PaginatedData<Barang>;
    currentFilters: {
        search?: string;
        kategori?: string;
    };
    kategoris: string[];
}

export interface BarangCreateProps extends PageProps {
    kategoris: string[];
}

export interface BarangEditProps extends PageProps {
    barang: Barang;
    kategoris: string[];
}

export interface DashboardProps extends PageProps {
    totalBarang: number;
    totalUser: number;
    totalPinjaman: number;
    barangTerbaru: Barang[];
}

export interface InventarisProps extends PageProps {
    barangs: PaginatedData<Barang>;
    kategoris: string[];
    currentFilters: {
        search?: string;
        kategori?: string;
    };
}