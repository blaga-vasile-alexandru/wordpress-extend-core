import { useState, useMemo } from '@wordpress/element';
import { useDispatch } from '@wordpress/data';
import {Modal, SearchControl} from '@wordpress/components';
import {
    BlockContextProvider,
    store as $blockEditorStore,
    __experimentalBlockPatternsList as BlockPatternsList,
} from '@wordpress/block-editor';

const PatternSelectionModal = ({
                                   clientId: $clientId,
                                   attributes: $attributes,
                                   setIsPatternSelectionModalOpen
                               }) => {


    return <Modal overlayClassName={`block-library-${$clientId}-pattern__selection-modal`}
                  title={'Choose a pattern'}
                  onRequestClose={() => setIsPatternSelectionModalOpen(false)}>
        <div className={`block-library-${$clientId}-pattern__selection-content`}>
            <div className={`block-library-${$clientId}-pattern__selection-search`}>

            </div>
        </div>
    </Modal>
}

export default PatternSelectionModal;
