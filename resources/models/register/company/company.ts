import { Model } from "@/models/Model";
import { Activity } from "./activity";
import { RegistrationStatus } from "./registrationStatus";

export class Company extends Model {
    corporate_name: string;
    fantasy_name: string;
    cpf: string;
    cnpj: string;
    crt: string;
    issqn: Number;
    situation: RegistrationStatus;
    foundation_date: Date;
    wholesale_retail: boolean;
    enabled: boolean;
    created_at: Date;
    updated_at: Date;
    secondary_activities:Array<Activity>

    constructor(args?:any){
        super(args)
        this.secondary_activities = this.secondary_activities || new Array<Activity>()
    }

}
