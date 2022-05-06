import { rest } from 'msw'
import.meta.
export const handlers = [
    // Handles a POST /login request
    rest.get(`wsCnpj/cnpj/:cnpj`, async (req, res, ctx) => {
        const {cnpj} = req.params
        const module = await import(`./wsCnpj/cnpj/${cnpj}.json`);
        return res(
            ctx.status(200),
            ctx.json(module)
        )
    }),
    // Handles a GET /user request
]
