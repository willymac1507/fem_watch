export type Items = {
    id: number;
    title: string;
    thumb_trending_large: string;
    thumb_trending_small: string;
    thumb_large: string;
    thumb_small: string;
    thumb_medium: string;
    year: number;
    category: string;
    rating: string;
    bookmarked: boolean;
    trending: boolean;
}

export type Flash = {
    success: string | null | undefined;
    error: string | null | undefined;
    warning: string | null | undefined;
}
