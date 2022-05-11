import { Model } from "@/models/Model";
import { Moment } from "moment";
import { Address } from "../address";
import { Activity } from "./activity";
import { RegistrationStatus } from "./registrationStatus";

export class Company extends Model {
    corporate_name: string | null
    fantasy_name: string | null
    cpf: string | null
    cnpj: string | null
    crt: string | null
    state_registration: string | null
    city_registration: string | null
    issqn: Number | null
    situation: RegistrationStatus | null;
    foundation_date: Moment | null;
    wholesale_retail: boolean | null
    enabled: boolean | null
    created_at: Date | null;
    updated_at: Date | null;
    secondary_activities: Array<Activity> | null
    address: Address | null

    constructor(args?: any) {
        super(args)
    }

    init() {
        return {
            corporate_name: null,
            fantasy_name: null,
            cpf: null,
            cnpj: null,
            crt: null,
            issqn: null,
            situation: null,
            state_registration: null,
            city_registration: null,
            address: new Address(),
            ...super.init()
        }
    }
}
