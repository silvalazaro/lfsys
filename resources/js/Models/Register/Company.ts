import { Model } from "../Model";

export class Company extends Model {
    cpf: String;
    cnpj: String;
    crt: String;
    issqn: Number;
    foundation_date: Date;
    wholesale_retail: boolean;
    enabled: boolean;
    created_at: Date;
    updated_at: Date;
}
