/*
|--------------------------------------------------------------------------
| 新規ユーザーかどうかをチェックする
|--------------------------------------------------------------------------
|
|
*/
export function checkNewUser() {
    if (localStorage.getItem("user_first_visit") === null) {
        localStorage.setItem("user_first_visit", new Date());
        return true;
    } else {
        return false;
    }
}

export function getDeviceType(userAgent) {
    return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
        userAgent
    )
        ? "mobile"
        : "desktop";
}

export function getBrowser(userAgent) {
    if (userAgent.indexOf("Chrome") > -1) return "Chrome";
    if (userAgent.indexOf("Safari") > -1) return "Safari";
    if (userAgent.indexOf("Firefox") > -1) return "Firefox";
    if (userAgent.indexOf("MSIE") > -1 || userAgent.indexOf("Trident/") > -1)
        return "Internet Explorer";
    if (userAgent.indexOf("Edge") > -1) return "Edge";
    return "unknown";
}

export function getOS(userAgent, platform) {
    if (/Win/i.test(platform)) return "Windows";
    if (/Mac/i.test(platform)) return "MacOS";
    if (/Linux/i.test(platform)) return "Linux";
    if (/iPhone|iPad|iPod/i.test(platform)) return "iOS";
    if (/Android/i.test(userAgent)) return "Android";
    return "unknown";
}

/*
|--------------------------------------------------------------------------
| ユーザーのデバイス情報を取得する
|--------------------------------------------------------------------------
|
|
*/
export function getUserDeviceInfo() {
    const userAgent = window.navigator.userAgent;
    const platform = window.navigator.platform;

    return {
        type: getDeviceType(userAgent),
        browser: getBrowser(userAgent),
        os: getOS(userAgent, platform),
    };
}

/*
|--------------------------------------------------------------------------
| ユーザーの位置情報を取得する
|--------------------------------------------------------------------------
|
|
*/
export async function getLocationInfo() {
    try {
        const response = await fetch("https://ipapi.co/json/");
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        const locationData = await response.json();
        return {
            country: locationData.country_name,
            city: locationData.city,
        };
    } catch (error) {
        console.error("Error fetching location info:", error);
        return {};
    }
}

/*
|--------------------------------------------------------------------------
| ユーザーのセッション情報を取得する
|--------------------------------------------------------------------------
|
|
*/
export function getSessionDuration() {
    const sessionStart = localStorage.getItem("session_start");
    if (sessionStart === null) {
        localStorage.setItem("session_start", new Date());
        return 0;
    } else {
        const sessionStartTime = new Date(sessionStart);
        return Math.floor((new Date() - sessionStartTime) / 1000);
    }
}

export function isFromSearchEngine(referrer) {
    const searchEngines = [
        "google.com",
        "bing.com",
        "yahoo.com",
        "baidu.com",
        "yandex.com",
        "duckduckgo.com",
        "ask.com",
    ];
    const domain = new URL(referrer).hostname;
    return searchEngines.some((engine) => domain.includes(engine));
}

export function isFromSocialMedia(referrer) {
    const socialMedia = [
        "facebook.com",
        "twitter.com",
        "instagram.com",
        "linkedin.com",
        "pinterest.com",
        "youtube.com",
    ];
    const domain = new URL(referrer).hostname;
    return socialMedia.some((platform) => domain.includes(platform));
}

/*
|--------------------------------------------------------------------------
| ユーザーのトラフィックソースを取得する
|--------------------------------------------------------------------------
|
|
*/
export function getTrafficSource() {
    const referrer = document.referrer;

    if (!referrer) {
        return "direct";
    } else if (isFromSearchEngine(referrer)) {
        return "search engine";
    } else if (isFromSocialMedia(referrer)) {
        return "social media";
    } else {
        return "other";
    }
}

/*
|--------------------------------------------------------------------------
| 分析データを送信する
|--------------------------------------------------------------------------
|
|
*/
export async function submitAnalyticsData(endpoint, data) {
    try {
        const response = await fetch(endpoint, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(data),
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        // 追加: 応答を表示または処理する場合
        const responseData = await response.json();
        console.log(responseData);
    } catch (error) {
        console.error("Error submitting analytics data:", error);
    }
}
