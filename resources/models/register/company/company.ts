import { Model } from "@/models/Model";
import { Moment } from "moment";
import { Address } from "../address";
import { Activity } from "./activity";
import { RegistrationStatus } from "./registrationStatus";

export class Company extends Model {
    corporate_name: string
    fantasy_name: string
    cpf: string
    cnpj: string
    crt: string
    state_registration: string
    city_registration: string
    issqn: Number
    situation: RegistrationStatus;
    foundation_date: Moment;
    wholesale_retail: boolean
    enabled: boolean
    created_at: Date;
    updated_at: Date;
    secondary_activities: Array<Activity>
    address: Address

    constructor(args?: any) {
        super(args)
    }

    init() {
        return {
            corporate_name: '',
            fantasy_name: '',
            cpf: '',
            cnpj: '',
            crt: '',
            issqn: '',
            situation: '',
            state_registration: '',
            city_registration: '',
            address: new Address(),
            ...super.init()
        }
    }
}
