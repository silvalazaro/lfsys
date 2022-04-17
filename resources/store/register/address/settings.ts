import { defineStore } from 'pinia'

export const useStore = defineStore('configAddress', {
    state: () => {
        return {
            cep: true,
            place: true,
            number: true,
            street: true,
            neighborhood: true,
            city: true,
            uf: true
        }
    }
})
