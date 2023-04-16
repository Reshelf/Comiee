// 翻訳の型定義
export type Translation = Record<string, string>;

export interface Translations {
    [key: string]: Translation;
}
