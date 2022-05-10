import _ from 'lodash'

export class Model {
    id: String

    constructor(args?: any) {
        _.assign(this, this.init())
        _.assign(this, args)
    }

    init():any {
        return {
            id: ''
        }
    }
}
