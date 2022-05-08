import _ from 'lodash'

export class Model {
    id: String

    constructor(args?: any) {
        _.assign(this, args)
    }
}
