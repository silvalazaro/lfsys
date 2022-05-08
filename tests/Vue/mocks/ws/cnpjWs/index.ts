import { rest } from 'msw'

export const endpoints = {
    cnpj: `/ws/cnpj.ws/cnpj`
}

export const handlers = [
    // Handles a POST /login request
    rest.get(`${import.meta.env.VITE_APP_URL}/ws/cnpj.ws/cnpj/:cnpj`, async (req, res, ctx) => {
        const {cnpj} = req.params
        const module = await import(`./cnpj/${cnpj}.json`);
        return res(
            ctx.status(200),
            ctx.json(module)
        )
    }),
]
