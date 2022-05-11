import { Model } from "@/models/Model";

export class State extends Model {
    name: string | null
    initials: string | null

    init() {
        return {
            ...super.init(),
            name: null,
            initials: null
        }
    }

}
