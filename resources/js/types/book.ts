// 作品の型定義
export interface Book {
    id: number;
    user_id: number;
    is_complete: boolean;
    is_new: boolean;
    is_color: boolean;
    is_hidden: boolean;
    is_suspend: boolean;
    is_all_charge: string;
    title: string;
    screen_type: string;
    lang: string;
    genre_id: number;
    views: number;
    story: string | null;
    thumbnail: string | null;
    created_at: string;
    updated_at: string;
    deleted_at: string | null;

    likes_count: number; // お気に入り数
    count_episode_likes: number; // エピソードいいね数
}
