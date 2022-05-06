import { rest } from 'msw'
export const handlers = [
    // Handles a POST /login request
    rest.get('http://localhost/message', (req, res, ctx) => {
        return res(
            ctx.status(200),
            ctx.json({
                username: 'admifn'
            })
        )
    }),
    // Handles a GET /user request
    rest.get('/user', null),
]
