import { Model } from "@/models/Model";
import { State } from "../state";

export class City extends Model {
    name: string;
    state_id: number;
    state: State;

    init() {
        return {
            ...super.init(),
            name: '',
            state_id: -1,
            state: new State()
        }
    }

}
