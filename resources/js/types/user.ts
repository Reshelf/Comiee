// ユーザーの型定義
export interface User {
    id: number;
    name: string | null;
    username: string;
    email: string;
    email_verified_at: string | null;
    gender: string | null;
    birth: string | null;
    country: string | null;
    lang: string | null;
    stripe_user_id: string | null;
    danger: number;
    is_pro: boolean;
    is_vip: boolean;
    avatar: string | null;
    thumbnail: string | null;
    body: string | null;
    password: string | null;
    m_notice_1: boolean;
    m_notice_2: boolean;
    m_notice_3: boolean;
    m_notice_4: boolean;
    m_notice_5: boolean;
    m_notice_6: boolean;
    website: string | null;
    twitter: string | null;
    youtube: string | null;
    instagram: string | null;
    deleted_at: string | null;
    remember_token: string | null;
    created_at: string;
    updated_at: string;
}
