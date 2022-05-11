import { Model } from "@/models/Model";
import { useStore } from '@/store/register/address/settings'
import { reactive } from 'vue'
import { ruleRequired, ruleCep } from '@/scripts/util/rules'
import { City } from "../city";

export class Address extends Model {
    cep: string;
    street_type: string;
    street: string;
    number: string;
    longitude: number
    latitude: number;
    ad_neighborhood: string
    neighborhood_id: number;
    city_id: number;
    city: City

    constructor(args?:any) {
        super(args)
    }

    init() {
        return {
            ...super.init(),
            cep: '',
            street: '',
            street_type: '',
            number: '',
            longitude: 0,
            latitude: 0,
            ad_neighborhood: '',
            neighborhood_id: 0,
            city_id: 0,
            city: new City()
        }
    }

}

export function createRules() {
    const config = useStore()
    const cep:any[] = []
    const rules:{[key: string]: any} = {}

    if (config.cep) {
        cep.push(ruleRequired('cep'))
    }
    cep.push(ruleCep())

    if(config.place){
        rules.place = [ruleRequired('Logradouro')]
    }

    if(config.number){
        rules.number = [ruleRequired('Número')]
    }

    rules.cep = cep

    return reactive(rules)
}
