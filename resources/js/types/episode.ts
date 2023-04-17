export interface Episode {
    id: number;
    book_id: number;
    number: number | null;
    title: string | null;
    contents: any[] | null;
    thumbnail: string | null;
    short_from_author: string | null;
    is_hidden: boolean;
    is_free: boolean;
    price: number;
    views: number;
    created_at: string;
    updated_at: string;
}
