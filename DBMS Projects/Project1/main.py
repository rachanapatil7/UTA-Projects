import copy

transactionTableRows = []
lockTableRows = []
waiting_transactions = []
inputArrayList = []
RL = "readLock_item"
WL = "writeLock_item"
AC = "active"
C = "committed"
W = "waiting"
A = "abort"
returnflag = 1


class transactionTable():
    def __init__(self, transaction_id, timestamp, transaction_state):
        self.transactionID = transaction_id
        self.blocked_Operation = []
        self.timestamp = timestamp
        self.locked_Resources = []
        self.transaction_state = transaction_state



    def addLockedResource(self, resourceName):
        self.locked_Resources.append(resourceName)

    def changeTransactionState(self, state):
        self.transaction_state = state

    def addBlockedOperation(self, operation):
        self.blocked_Operation.append(operation)




class lockTable:
    def __init__(self, locked_data_item, transaction_id, lock_state):
        self.locked_Data_Item = locked_data_item
        self.lockHeld_By = []
        self.lock_state = lock_state
        self.waiting_transactions = []
        self.lockHeld_By.append(transaction_id)

    def addWaitingTransaction(self, transaction_id):
        self.waiting_transactions.append(transaction_id)

    def changeLock_state(self, LS):
        self.lock_state = LS

    def addLockHeld(self, transaction_id):
        self.lockHeld_By.append(transaction_id)


# this method was used to fetch transaction number from the operation
def fetchDigit(searchstr):
    num = ""
    for inc in searchstr:
        if inc.isdigit():
            num += inc
    return int(num)


# In this method new transaction is started and a record is added to transaction table
def begin_transaction(str):
    txNumber = fetchDigit(str)
    #print( "Transaction %d is started" % (txNumber) + " " + " and transaction added to transaction table.")
    print( "Transaction {} is started and transaction added to transaction table.".format(txNumber))
    ts = int(len(transactionTableRows)) + 1
    transactionTableRows.append(transactionTable(txNumber, ts, AC))

# if the transaction is aborted,the operations of that transaction will be ignored. used to check status of transaction
def check_status(str):
    resource_name = resource_n_id(str)[0]
    transaction_id = resource_n_id(str)[1]

    l = len(transactionTableRows)
    if l != 0:
        for inc in range(0, l):
            if transactionTableRows[inc].transaction_state == W and transactionTableRows[inc].transactionID == transaction_id:
                transactionTableRows[inc].addBlockedOperation(operation)
            elif transactionTableRows[inc].transaction_state == A:
                operation = ""
                print("Operation is ignored as Transaction already aborted")
    return str


# this method puts read lock on an item by a specific transaction.
# it checks for conflicting locks and calls the wound-wait function in case of deadlock situations.
def readLock_item(input_Line):
    resource_name = resource_n_id(input_Line)[0]
    transaction_ID = resource_n_id(input_Line)[1]
    flag = 0
    length = len(lockTableRows)
    if length != 0:
        for inc in range(0, length):
            if lockTableRows[inc].locked_Data_Item == resource_name:
                flag = 1
                if lockTableRows[inc].lock_state == WL:  # checks with requesting item is under write Lock by any other transaction and if so then calls wound wait.
                    print("Conflicting Write lock: item {} is under Read Lock by Transaction {}" .format(resource_name,
                        lockTableRows[inc].lockHeld_By[0]))
                    print("calling wound-wait")
                    wound_wait(search_transaction_id(transaction_ID),
                              search_transaction_id(lockTableRows[inc].lockHeld_By[0]), lockTableRows[inc], input_Line)
                elif lockTableRows[inc].lock_state == RL:
                    lockTableRows[inc].addLockHeld(transaction_ID);
                    search_transaction_id(transaction_ID).addLockedResource(resource_name)
                    print("Putting the item resource {} under Read Lock by Transaction {}" .format(resource_name,
                        lockTableRows[inc].lockHeld_By[0]))
        if flag == 0:
            lockTableRows.append(lockTable(resource_name, transaction_ID,
                                              RL))
            search_transaction_id(transaction_ID).addLockedResource(resource_name)
            print("Putting the item resource {} under Read Lock by Transaction {}" .format(resource_name,transaction_ID) )
    else:
        lockTableRows.append(lockTable(resource_name, transaction_ID, RL))
        search_transaction_id(transaction_ID).addLockedResource(resource_name)
        print("Putting the item resource {} under Read Lock by Transaction {}" .format(resource_name,
            lockTableRows[0].lockHeld_By[0]))


# transaction puts a specific item under write lock
# checks for conflicts in between locks and if so calls the wound-wait function.
def writeLock_item(input_Line):
    resource_name = resource_n_id(input_Line)[0]
    transaction_ID = resource_n_id(input_Line)[1]
    flag = 0
    length = len(lockTableRows)
    if length != 0:
        for inc in range(0, length):
            if lockTableRows[inc].locked_Data_Item == resource_name:
                flag = 1
                if lockTableRows[inc].lock_state == RL:
                    if len(lockTableRows[inc].lockHeld_By) == 1:
                        if lockTableRows[inc].lockHeld_By[0] == transaction_ID:  # checks if the item is under Read Lock by the same transaction
                            lockTableRows[inc].lock_state = WL
                            print("Upgrading data item resource from Read lock to Write Lock for transaction {}".format(resource_name,transaction_ID))
                        else:
                            print("data item {} is under ReadLock by multiple transaction. ".format(resource_name))
                            print("Calling Wound Wait") # calls wound wait function if item is under Read Lock by another transaction)
                            wound_wait(search_transaction_id(transaction_ID),
                                      search_transaction_id(lockTableRows[inc].lockHeld_By[0]), lockTableRows[inc],
                                      input_Line)
                    else:
                        c= 0
                        for lockedresource in lockTableRows:
                            if lockedresource.locked_Data_Item == resource_name:
                                for j in lockedresource.lockHeld_By:
                                    if j == transaction_ID:
                                        c += 1
                        # calling wound wait if item is under Read Lock by multiple transactions
                        wound_wait(search_transaction_id(transaction_ID),
                                  search_transaction_id(lockTableRows[inc].lockHeld_By[c]), lockTableRows[inc],
                                  input_Line)
                elif lockTableRows[inc].lock_state == WL:
                    print("Conflicting Write Locks: item resource {} is under Write Lock by Transaction {}" .format(resource_name,
                        lockTableRows[inc].lockHeld_By[0]))
                    print("calling wound wait")
                    wound_wait(search_transaction_id(transaction_ID),
                              search_transaction_id(lockTableRows[inc].lockHeld_By[0]), lockTableRows[inc], input_Line)
        if flag == 0:
            lockTableRows.append(
                lockTable(resource_name, transaction_ID, WL))  # appending a new resource to the lockTable
            search_transaction_id(transaction_ID).addLockedResource(resource_name)
            print("item resource {} is under Write Lock by Transaction {}" .format(resource_name,
                lockTableRows[0].lockHeld_By[0]))
    else:
        lockTableRows.append(lockTable(resource_name, transaction_ID, WL))
        search_transaction_id(transaction_ID).addLockedResource(resource_name)


# wound wait function which prevents deadlock
def wound_wait(requesting_transaction, ongoing_transaction, lockedResource, opr):
    if requesting_transaction.timestamp < ongoing_transaction.timestamp:
        ongoing_transaction.changeTransactionState(A)
        print("Aborting Transaction {}" .format(ongoing_transaction.transactionID))
        requesting_transaction.changeTransactionState(W)
        requesting_transaction.addBlockedOperation(opr)
        waiting_transactions.append(requesting_transaction)
        unlock_item(
            ongoing_transaction.transactionID)  # unlocking all the resources of the transaction that was aborted by wound wait
    else:
        requesting_transaction.changeTransactionState(W)  # add transaction to the waiting list
        print("changing transaction state for transaction {} to waiting" .format(requesting_transaction.transactionID))
        if checkDuplicateOperation(opr, requesting_transaction):
            requesting_transaction.addBlockedOperation(opr)
        if checkDuplicateTransaction(requesting_transaction):
            waiting_transactions.append(requesting_transaction)


# Used to check if the transaction is already in the waiting List of Transactions
def checkDuplicateTransaction(tx):
    for t in waiting_transactions:
        if t.transactionID == tx.transactionID:
            return 0
    return 1


def checkDuplicateOperation(opr, tx):
    for blocked_Operation in tx.blocked_Operation:
        if blocked_Operation == opr:
            return 0
    return 1


# for a string input, this method returns the transactionID and the resource name like X or Y or Z
def resource_n_id(input_Line):
    if input_Line.find("X") != -1:
        resource_name = "X"
    elif input_Line.find("Z") != -1:
        resource_name = "Z"
    elif input_Line.find("Y") != -1:
        resource_name = "Y"
    transaction_id = fetchDigit(input_Line)
    return resource_name, transaction_id


# searches for the transaction in the transactionTable using transaction ID and input
def search_transaction_id(transaction_id):
    for t in transactionTableRows:
        if t.transactionID == transaction_id:
            return t



# check if the transaction in waiting list can be resumed
def Start_Waiting_Transactions():
    print("verifying if there are any transaction waiting on the free resource")
    for i in waiting_transactions:
        if i.transaction_state == A:
            waiting_transactions.remove(i)
        else:
            blockOpCopy = copy.deepcopy(i.blocked_Operation)
            for blocked_Operation in i.blocked_Operation:
                i.transaction_state = AC  # waiting list transactions are activated and call the operations that are in the waitlist
                print("attempting operation " + blocked_Operation)
                operationAssignment(blocked_Operation)
                if i.transaction_state != W:
                    blockOpCopy.remove(blocked_Operation)
            i.blocked_Operation = blockOpCopy
            if len(i.blocked_Operation) == 0:
                waiting_transactions.remove(i)


# This method is called when the transaction ends. It will commit the transaction and frees all the items held.
def end_transaction(opr):
    transaction_number = fetchDigit(opr)
    for transact in transactionTableRows:
        try:
            if transact.trasnsactionState != A and transact.transactionID == transaction_number:
                print("The Committing transaction {}" .format(transaction_number))
                transact.transaction_state = C
        except AttributeError:
            print("The Committing transaction {}" .format(transaction_number))
            transact.transaction_state = C
    unlock_item(transaction_number)


# Unlocks the items held by transaction id
def unlock_item(transaction_id):
    print("Unlock all items locked by transaction {}".format(transaction_id))
    for i in transactionTableRows:
        if i.transactionID == transaction_id:
            for l in i.locked_Resources:
                for r in lockTableRows:
                    if r.locked_Data_Item == l:
                        if len(r.lockHeld_By) == 1:
                            lockTableRows.remove(r)
                        else:
                            r.lockHeld_By.remove(transaction_id)
    Start_Waiting_Transactions()



# Depending on input operation string it calls the respective function
def operationAssignment(op):
    opr=op.lower();

    #print(opr)

    if op.lower().find('b') == 1:
        op = check_status(op)

    if op.lower().find('b') != -1:
        print("{} is a Begin operation".format(op))
        begin_transaction(op)
    elif op.lower().find('r') != -1:
        print("{} is a Read operation".format(op))
        readLock_item(op)
    elif op.lower().find('w') != -1:
        print("{} is a write operation".format(op))
        writeLock_item(op)
    elif op.lower().find("e") != -1:
        print("{} is an End operation".format(op))
        #print("End of Transaction")
        end_transaction(op)


# Input file is opened and read by the below code
def read_input_file():

    with open('Input1.txt','r') as f:
        for i in f:
            inputArrayList.append(i)



    print(inputArrayList)
    print(type(inputArrayList))
    print(len(inputArrayList))


    for i in inputArrayList:
        operationAssignment(i)
        print("---------------------------------------------------------------------------------------------")




# calling the Read file function
read_input_file()

