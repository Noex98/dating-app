import React, {useContext, useEffect, useState} from 'react'
import { userContext } from '../../../../components'
import { apiModel } from '../../../../models/apiModel';
import { IUser } from '../../../../types';

export const Matches = () => {

    const [matches, setMatches] = useState<IUser[]>([]);
    const user = useContext(userContext);

    useEffect(() => {
        apiModel.getMatches().then(res => {
            setMatches(res.data)
        })
    }, [user?.data?.preferences])


    return (
        <>
            <div>Matches</div>
            {matches.map(user => (
                <div>{user.firstname}</div>
            ))}
        </>
    )
}
