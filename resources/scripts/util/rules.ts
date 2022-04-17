import { maskCep } from "./mask"

export function ruleRequired(name: string) {
    return {
        required: true, message: `${name} é obrigatório`
    }
}

export function ruleCep(name?: string) {
    return {
        validator(rule: any, value: any, callback: any) {
            if (value && maskCep(value).length === 9) {
                callback()
            } else {
                callback(new Error('CEP inválido'))
            }
        }
    }
}
