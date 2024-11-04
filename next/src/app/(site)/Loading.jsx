import Logo from "@/Theme/Public/Logo"

const Loading = () => {
    return <>
        <div className="new-loading">
            <div className="loading-content">
                <Logo type="md" />
                <span>
                    <div className="loading1"></div>
                    <div className="loading2"></div>
                    <div className="loading3"></div>
                </span>
            </div>
        </div>
    </>
}

export default Loading