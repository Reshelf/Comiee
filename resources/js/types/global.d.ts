// global.d.ts
import { AxiosInstance } from "axios";
import _ from "lodash";

declare global {
    interface Window {
        _: typeof _;
        axios: AxiosInstance;
        csrf_token: string;
    }
}