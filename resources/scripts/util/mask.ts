import { mask } from 'maska'

export function maskCep(value: number){
    return  mask(value, '#####-###')
}
