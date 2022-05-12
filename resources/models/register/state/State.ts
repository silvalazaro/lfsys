import { SysSelectInterface } from "@/components/lfsys/select";
import { Model } from "@/models/Model";

export class State extends Model implements SysSelectInterface{
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
