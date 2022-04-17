import { Model } from "@/models/Model";
import { useStore } from '@/store/register/address/settings'
import { reactive } from 'vue'
import { ruleRequired, ruleCep } from '@/scripts/util/rules'

export class Address extends Model {
    cep: string;
    place: string;
    number: string;
    longitude: number
    latitude: number;
    neighborhood_id: number;
    city_id: number;
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
