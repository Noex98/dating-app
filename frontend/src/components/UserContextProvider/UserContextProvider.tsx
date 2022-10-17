import { ReactNode, createContext, useState } from 'react';
import { ICurrentUser } from '../../types';

export const userContext = createContext<ICurrentUser | null>(null)

type Props = {
    children: ReactNode
}

/**
 * Enables children to access user data
 * @param children
 */

export const UserContextProvider = ({children} : Props) => {

    const [user, setUser] = useState<ICurrentUser | null>(null);

    function loadUser(){
        setUser(null);
    }

    return (
        <userContext.Provider value={user}>
                {children}
        </userContext.Provider>
    )
}
